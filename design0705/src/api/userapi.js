//此文件处理登陆，注册，是否启用临时用户等信息
var _ = require('underscore');
var bcrypt = require('bcrypt');
var uuid = require('node-uuid');
var users = require('./users');
var designs = require('./designs');
var userDB = require('./userdb');
var nconf = require('nconf');
var config = nconf.get();

var UserAPI = function(app) {

  // Create a new user  创建一个新用户
  app.post(/^\/signup\/?$/, function(req, res) {
    var username = req.body.username;
    var emailAddress = req.body.emailAddress;
    var password = req.body.password;

    var errors = {};
    var view = {
      username: username,
      emailAddress: emailAddress,
      password: password,
      errors: errors,
      track: config.track,
    };

    if (username === undefined) {
      errors.username = 'please provide a valid username (only letters and numbers)';
    }
    if (emailAddress === undefined) {
      errors.emailAddress = 'please provide a valid email address';
    }
    if (password === undefined) {
      errors.password = 'please provide a password with a minimum of 6 characters';
    }

    if (!users.validateUsername(username)) {
      errors.username = 'please provide a valid username (only letters and numbers)';
    }
    if (!users.validateEmailAddress(emailAddress)) {
      errors.emailAddress = 'please provide a valid email address';
    }

    if (!users.validatePassword(password)) {
      errors.password = 'please provide a password with a minimum of 6 characters';
    }

    if (userDB.userExists(username)) {
      errors.username = 'sorry, this username is taken';
    }

    if (_.keys(errors).length) {
      res.render('signup', view);
      return;
    }

    // Rename the db to the new user 将临时用户的设计数据转给注册用户
    if (req.session.temporary) {
      userDB.rename(req.session.username, username);
    }

    userDB.init(username, function(err, db) {
      if (err) {
        console.error(err);
        return res.render('signup', {
          track: config.track
        });
      }

      function createIfNotTemporary(callback) {
        if (!req.session.temporary) {
          userDB.create(db, callback);
        } else {
          callback(null);
        }
      }

      createIfNotTemporary(function(err) {
        if (err) {
          console.error(err);
          return res.render('signup', {
            track: config.track
          });
        }

        var userData = {
          username: username,
          emailAddress: emailAddress,
          password_bcrypt: bcrypt.hashSync(password, 12),
          createdAt: new Date().toISOString(),
        };

        if (req.session.temporary) {
          userData.upgradedFrom = req.session.username;
          userData.upgratedAt = new Date().toISOString();
          req.session.temporary = undefined;
        }

        users.create(db, userData, function(err) {
          if (err) {
            console.error(err);
            res.render('signup', {
              track: config.track
            });
          } else {
            req.session.username = username;
            res.redirect('/ui/' + username + '/designs');
          }
        });

      });
    });

  });
/********************************************************/
  // Create a new temporary user 创建一个临时用户
  app.post(/^\/createtemp\/?$/, function(req, res) {

    var username = 'tmp_' + uuid.v4();
    var userData = {
      username: username,
      temporary: true,
    };

    userDB.init(username, function(err, db) { //初始化数据库
      if (err) {  //如信息错误，跳转到注册页面
        console.error(err);
        return res.render('signup', {
          track: config.track
        });
      }

      userDB.create(db, function(err) { //创建数据库
        if (err) {  //如信息错误，跳转到注册页面
          console.error(err);
          return res.render('signup', {
            track: config.track
          });
        }

        users.create(db, userData, function(err) {   //创建用户
          if (err) {
            console.error(err);
            res.render('signup', {
              track: config.track
            });
          } else {
            req.session.username = username;
            req.session.temporary = true;
            req.session.firstTry = true;

            designs.create(db, username, 'design 1', function(err) { //创建一个设计，名字叫design 1
              if (err) {
                console.error(err);
                res.render('signup', {
                  track: config.track
                });
              } else {
                res.redirect('/ui/' + username + '/designs');
              }
            });
          }
        });
      });
    });  //end userDB.init

  }); // end app.post

  // app.get(/^\/user\/([\w%@.]+)\/?$/, function(req, res) {

  //   var username = decodeURIComponent(req.params[0]);
  //   if (!app.get('authEngine').canRead(username, req)) {
  //     res.json(401, 'Unauthorized');
  //     return;
  //   }

  //   users.get(db, username, function(err, userData) {
  //     if (err) {
  //       res.json(500, err);
  //     } else if (userData === null) {
  //       res.json(404, 'not found');
  //     } else {
  //       res.json(userData);
  //     }
  //   });

  // });

  // app.delete(/^\/session\/?$/, function(req, res) {
  //   req.session.destroy(function() {
  //     res.json(200, 'signed out');
  //   });
  // });

/*********用户登录*********/
  app.post(/^\/signin\/?$/, function(req, res) {
    var username = req.body.username;
    var password = req.body.password;
    var emailAddress = "fromDdayin@qq.com";
    
    if(username == "")  // 判读用户没有在Yii框架那边登录，则创建临时用户
    {
         var username = 'tmp_' + uuid.v4();
         var userData = {
         username: username,
         temporary: true,
         };

         userDB.init(username, function(err, db) {
         if (err) {
           console.error(err);
           return res.render('signup', {
           track: config.track
           });
         }

         userDB.create(db, function(err) {
         if (err) {
           console.error(err);
           return res.render('signup', {
           track: config.track
           });
         }

         users.create(db, userData, function(err) {
         if (err) {
            console.error(err);
            res.render('signup', {
            track: config.track
            });
          } else {
            req.session.username = username;
            req.session.temporary = true;
            req.session.firstTry = true;

            designs.create(db, username, 'design 1', function(err) {
              if (err) {
                console.error(err);
                return  res.render('signup', {
                track: config.track
                });
              } else {
               return  res.redirect('/ui/' + username + '/designs');
              }
            });
          }
          });
      });
    });  // end userDB.init
            return;   // 否则出现bug：http.js:689  throw new Error('Can\'t set headers after they are sent.');
    }  // end if(username == "") 创建临时用户结束    
   
   //开始登录，连接数据库
    userDB.init(username, function(err, db) {
      if (err) {
        console.error(err);
        return res.render('signin', {
          track: config.track
        });
      }

      users.checkPassword(db, username, password, function(err, paswordMatches) {
        if (err) {
          console.error(err);
          res.render('signin', {
            track: config.track
          });
        } else {
          if (paswordMatches) {
            req.session.username = username;
            res.redirect('/ui/' + username + '/designs');
         } else {   // start else  如果密码比匹配，即couch数据库没有此用户数据，则另外创建一个新用户
                 userDB.init(username, function(err, db) {

                   if (err) {
                    console.error(err);
                    return res.render('signup', {
                      track: config.track
                    });
                  }

                  function createIfNotTemporary(callback) {
                    if (!req.session.temporary) {
                      userDB.create(db, callback);
                    } else {
                      callback(null);
                    }
                  }
                  createIfNotTemporary(function(err) {
                    if (err) {  // direct to tmp
                    } // end direct to tmp
                   var userData = {
                   username: username,
                   emailAddress: emailAddress,
                   password_bcrypt: bcrypt.hashSync(password, 12),
                   createdAt: new Date().toISOString(),
                    };
                   users.create(db, userData, function(err) {
                      if (err) {  // jump to tmp
                                } else {
                        req.session.username = username;
                        res.redirect('/ui/' + username + '/designs');
                      }
                    });
                     }); // end createIfNotTemporary
                     }); // end userDB.init
              }  // end last else 结束，密码不匹配创建的新用户
        }
      });
    });
  });  //结束 app.post(sigin)

};  // 结束：var UserAPI = function(app) {


module.exports = UserAPI;


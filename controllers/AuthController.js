const User = require('../models/User')
const bcrypt = require('bcryptjs')
const { error } = require('console')
const jwt = require('jsonwebtoken')

const register = (req, res, next) => {
    bcrypt.hash(req.body.password, 10, function (err, hashedPass) {
        if (err) {
            res.json({
                error: err
            })
        }
    })
    let user = new User({
        name: req.body.name,
        email: req.body.email,
        password: hashedPass,
        confirmpassword: hashedPass
    })
    user.save()
        .then(user => {
            res.json({
                message: 'Them tai khoan thanh cong'
            })
        })
        .catch(error => {
            res.json({
                message: 'Co loi xay ra'
            })
        })
}

module.exports = {
    register
}

const { Timestamp } = require('bson')
const mongoose = require('mongoose')
const { type } = require('os')
const Schema = mongoose.Schema

const userSchema = new Schema({
    name: {
        type: String
    },
    email: {
        type: String
    },
    password: {
        type: String
    },
    confirmpassword: {
        type: String
    }
}, { Timestamp: true })

const User = mongoose.model('User ,userSchema')
module.exports = User
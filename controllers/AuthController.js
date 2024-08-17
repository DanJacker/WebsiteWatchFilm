const bcrypt = require('bcryptjs');
const User = require('../models/User');

const register = (req, res) => {
    bcrypt.hash(req.body.password, 10, function (err, hashedPass) {
        if (err) {
            return res.status(500).json({ error: err.message });
        }

        let user = new User({
            name: req.body.name,
            email: req.body.email,
            password: hashedPass,
            confirmpassword: hashedPass
        });

        user.save()
            .then(() => {
                res.status(201).json({ message: 'Thêm tài khoản thành công' });
            })
            .catch(error => {
                res.status(500).json({ message: 'Có lỗi xảy ra', error });
            });
    });
};

const login = async (req, res) => {
    try {
        const { email, password } = req.body;

        const user = await User.findOne({ email });
        if (!user) {
            return res.status(400).send('Người dùng không tồn tại.');
        }

        const isMatch = await bcrypt.compare(password, user.password);
        if (!isMatch) {
            return res.status(400).send('Mật khẩu không chính xác.');
        }

        res.send('Đăng nhập thành công.');
    } catch (error) {
        res.status(500).json({ message: 'Có lỗi xảy ra', error });
    }
};

module.exports = {
    register,
    login
};

import React, { Component } from 'react';
import request from '../../../utils/request';
import swal from 'sweetalert';

class InformationForm extends Component {
    constructor(props) {
        super(props);
        this.state = { name: '', phone: '', email: '', content: '' };
    }

    submit() {
        console.log(this.state);
        request
            .post('/cart', this.state)
            .then((res) => {
                // console.log(res);

                swal({
                    title: 'Đặt hàng thành công!',
                    text: 'Đơn hàng đã được tiếp nhận!',
                    icon: 'success',
                }).then(function () {
                    window.location.reload();
                });

                localStorage.setItem('cart', JSON.stringify([]));
            })
            .catch((error) => {
                console.log(error);
                swal({
                    title: 'Fail!',
                    text: 'Lỗi! Hãy điền hết thông tin khách hàng.',
                    icon: 'error',
                });
            });
    }
    render() {
        return (
            <div className="col-md-4 border rounded-right p-3" style={{ background: '#ddd' }}>
                <div className="">
                    <h4 className="mtext-109 cl2 p-b-30">Tổng đơn hàng</h4>
                    <hr />

                    <div className="d-flex justify-content-between">
                        <div className="">
                            <span className="mtext-101 cl2">Tạm tính:</span>
                        </div>

                        <div className="size-209 p-t-1">
                            <span className="mtext-110 cl2">
                                <sup>₫</sup>
                                {this.props.total}
                            </span>
                        </div>
                    </div>
                    <hr />
                    <div className="d-flex justify-content-between mb-3">
                        <div className="">
                            <span className="font-weight-bold">Tổng tiền:</span>
                        </div>

                        <div className="size-209 p-t-1">
                            <span className="font-weight-bold">
                                <sup>₫</sup>
                                {this.props.total}
                            </span>
                        </div>
                    </div>
                    {/* THONG TIN KHACH HANG */}
                    <div className="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div className="size-100 p-r-18 p-r-0-sm w-full-ssm">
                            <div className="p-t-15">
                                <h5 className="stext-112 cl8">Thông tin khách hàng</h5>

                                <div className="m-1">
                                    <input
                                        style={{
                                            border: '1px solid rgba(0, 0, 0, 0.137)',
                                            background: 'rgb(247, 247, 247)',
                                        }}
                                        className=" "
                                        type="text"
                                        name="name"
                                        placeholder="Tên Khách Hàng"
                                        onChange={(item) => {
                                            this.setState({ name: item.target.value });
                                        }}
                                    />
                                </div>

                                <div className="m-1">
                                    <input
                                        style={{
                                            border: '1px solid rgba(0, 0, 0, 0.137)',
                                            background: 'rgb(247, 247, 247)',
                                        }}
                                        className=" "
                                        type="text"
                                        name="phone"
                                        placeholder="Số Điện Thoại"
                                        onChange={(item) => {
                                            this.setState({ phone: item.target.value });
                                        }}
                                    />
                                </div>

                                <div className="m-1">
                                    <input
                                        style={{
                                            border: '1px solid rgba(0, 0, 0, 0.137)',
                                            background: 'rgb(247, 247, 247)',
                                        }}
                                        className=" "
                                        type="text"
                                        name="email"
                                        placeholder="Email Liên Hệ"
                                        onChange={(item) => {
                                            this.setState({ email: item.target.value });
                                        }}
                                    />
                                </div>

                                <div className="m-1">
                                    <textarea
                                        style={{
                                            border: '1px solid rgba(0, 0, 0, 0.137)',
                                            background: 'rgb(247, 247, 247)',
                                        }}
                                        className=" w-100"
                                        name="content"
                                        placeholder="Ghi chú đơn hàng"
                                        onChange={(item) => {
                                            this.setState({ content: item.target.value });
                                        }}
                                    ></textarea>
                                </div>

                                {/* @endif */}
                            </div>
                        </div>
                    </div>

                    <button
                        className="btn btn-info w-100 my-1 text-white"
                        onClick={() => {
                            this.submit();
                        }}
                    >
                        Tiến hành thanh toán
                    </button>
                </div>
            </div>
        );
    }
}

export default InformationForm;

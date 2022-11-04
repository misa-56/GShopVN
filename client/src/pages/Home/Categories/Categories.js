import React from 'react';
import { Link } from 'react-router-dom';
import request from '../../../utils/request';
// import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import List from './List';

class Categories extends React.Component {
    constructor(props) {
        super(props);
        this.state = { entertains: [], works: [], tools: [], studies: [], designs: [], vpns: [], data4gs: [] };
    }

    componentDidMount() {
        request
            .get('/categories')
            .then((res) => {
                const entertains = res.data.entertains;
                const works = res.data.works;
                const tools = res.data.tools;
                const studies = res.data.studies;
                const designs = res.data.designs;
                const vpns = res.data.vpns;
                const data4gs = res.data.data4gs;
                this.setState({ entertains, works, tools, studies, designs, vpns, data4gs });
            })
            .catch((error) => console.log(error));
    }

    render() {
        return (
            <div className="mx-auto my-3 my-lg-5">
                <div className="d-flex justify-content-between">
                    <h4>Giải trí</h4>
                    <Link className="text-decoration-none text-info" to="danh-muc/1-giai-tri.html">
                        Xem thêm
                    </Link>
                </div>
                {/* <!-- ------------------ --> */}
                <div className="row">
                    {this.state.entertains.map((entertain) => (
                        <List
                            key={entertain.id}
                            thumb={entertain.thumb}
                            name={entertain.name}
                            price_sale={entertain.price_sale}
                            price={entertain.price}
                            id={entertain.id}
                        />
                    ))}
                    {/* @foreach ($entertains as $product)
                        @include('home.list')
                    @endforeach
                    <!-- ------------------- --> */}
                </div>
                <hr />
                {/* {{-- --------------------LAM VIEC-------------------- --}} */}
                <div className="mx-auto my-3 my-lg-5">
                    <div className="d-flex justify-content-between">
                        <h4>Làm Việc</h4>
                        <a className="text-decoration-none text-info" href="danh-muc/2-lam-viec.html">
                            Xem thêm
                        </a>
                    </div>
                    {/* <!-- ------------------ --> */}
                    <div className="row">
                        {this.state.works.map((work) => (
                            <List
                                key={work.id}
                                thumb={work.thumb}
                                name={work.name}
                                price_sale={work.price_sale}
                                price={work.price}
                                id={work.id}
                            />
                        ))}
                    </div>
                </div>
                <hr />
                {/* {{-- --------------------TIEN ICH VAN PHONG-------------------- --}} */}
                <div className="mx-auto my-3 my-lg-5">
                    <div className="d-flex justify-content-between">
                        <h4>Học Tập</h4>
                        <a className="text-decoration-none text-info" href="danh-muc/3-hoc-tap.html">
                            Xem thêm
                        </a>
                    </div>
                    {/* <!-- ------------------ --> */}
                    <div className="row">
                        {this.state.studies.map((study) => (
                            <List
                                key={study.id}
                                thumb={study.thumb}
                                name={study.name}
                                price_sale={study.price_sale}
                                price={study.price}
                                id={study.id}
                            />
                        ))}
                    </div>
                </div>
                <hr />
                {/* {{-- --------------------HOC TAP-------------------- --}} */}
                <div className="mx-auto my-3 my-lg-5">
                    <div className="d-flex justify-content-between">
                        <h4>Tiện Ích Văn Phòng</h4>
                        <a className="text-decoration-none text-info" href="danh-muc/4-tien-ich.html">
                            Xem thêm
                        </a>
                    </div>
                    {/* <!-- ------------------ --> */}
                    <div className="row">
                        {this.state.tools.map((tool) => (
                            <List
                                key={tool.id}
                                thumb={tool.thumb}
                                name={tool.name}
                                price_sale={tool.price_sale}
                                price={tool.price}
                                id={tool.id}
                            />
                        ))}
                    </div>
                </div>
                <hr />
                {/* {{-- --------------------THIET KE-------------------- --}} */}
                <div className="mx-auto my-3 my-lg-5">
                    <div className="d-flex justify-content-between">
                        <h4>Thiết Kế</h4>
                        <a className="text-decoration-none text-info" href="danh-muc/5-thiet-ke.html">
                            Xem thêm
                        </a>
                    </div>
                    {/* <!-- ------------------ --> */}
                    <div className="row">
                        {this.state.designs.map((design) => (
                            <List
                                key={design.id}
                                thumb={design.thumb}
                                name={design.name}
                                price_sale={design.price_sale}
                                price={design.price}
                                id={design.id}
                            />
                        ))}
                    </div>
                </div>
                <hr />

                {/* {{-- --------------------VPN-------------------- --}} */}
                <div className="mx-auto my-3 my-lg-5">
                    <div className="d-flex justify-content-between">
                        <h4>VPN</h4>
                        <a className="text-decoration-none text-info" href="danh-muc/6-vpn.html">
                            Xem thêm
                        </a>
                    </div>

                    {/* <!-- ------------------ --> */}
                    <div className="row">
                        {this.state.vpns.map((vpn) => (
                            <List
                                key={vpn.id}
                                thumb={vpn.thumb}
                                name={vpn.name}
                                price_sale={vpn.price_sale}
                                price={vpn.price}
                                id={vpn.id}
                            />
                        ))}
                    </div>
                </div>
                <hr />
                {/* {{-- --------------------DATA-------------------- --}} */}
                <div className="mx-auto my-3 my-lg-5">
                    <div className="d-flex justify-content-between">
                        <h4>Gói cước - Data 4G</h4>
                        <a className="text-decoration-none text-info" href="danh-muc/7-goi-data.html">
                            Xem thêm
                        </a>
                    </div>
                    {/* <!-- ------------------ --> */}
                    <div className="row">
                        {this.state.data4gs.map((data4g) => (
                            <List
                                key={data4g.id}
                                thumb={data4g.thumb}
                                name={data4g.name}
                                price_sale={data4g.price_sale}
                                price={data4g.price}
                                id={data4g.id}
                            />
                        ))}
                    </div>
                </div>
            </div>
        );
    }
}

export default Categories;

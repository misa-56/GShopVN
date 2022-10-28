function Home() {
    return (
        <section id="content" class="container my-2 my-lg-3">
            <div class="mainBody">
                {/* {{-- --------------------Danh Muc & Slide-------------------- --}} */}
                <div class="d-flex">
                    <div class=" col-3 p-0 bg-white rounded-left d-none d-xl-block">
                        <div class="rounded-left">
                            <span
                                class="list-group-title list-group-item text-white"
                                // style="font-size: 18px;"
                            >
                                <b>Danh mục sản phẩm</b>
                            </span>
                            <ul
                                class="p-0 m-0"
                                // style="transform: rotate(-180deg);"
                            >
                                {/* {!! \App\Helpers\Helper::menus($menus) !!} */}
                            </ul>
                        </div>
                    </div>
                    {/* @include('slider') */}
                </div>
            </div>
        </section>
    );
}

export default Home;

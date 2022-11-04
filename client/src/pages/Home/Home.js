import './Home.css';
import Slider from './Slider/Slider';
import FeaturedProducts from './FeaturedProducts/FeaturedProducts';
import Categories from './Categories/Categories';
// import { Link } from 'react-router-dom';

function Home() {
    return (
        <section id="content" className="container my-2 my-lg-3">
            <div className="mainBody">
                <Slider />
                <FeaturedProducts />
                <hr />
                <Categories />
            </div>
        </section>
    );
}

export default Home;

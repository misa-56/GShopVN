import Header from './Header';
import Footer from './Footer';
import { Container } from 'react-bootstrap';

function MainLayout({ children }) {
    return (
        <div className="d-flex flex-column min-vh-100">
            <Header />
            <Container className="content my-2 my-lg-3">{children}</Container>
            <Footer />
        </div>
    );
}

export default MainLayout;

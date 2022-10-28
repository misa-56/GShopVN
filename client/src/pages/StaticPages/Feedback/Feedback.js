import React from 'react';
import request from '../../../utils/request';

export default class About extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            page: [],
        };
    }

    componentDidMount() {
        // let res = await
        request
            .get('/page/4')
            .then((res) => {
                console.log(res);
                const page = res.data;
                this.setState({ page });
            })
            .catch((error) => console.log(error));
    }

    render() {
        let { page } = this.state;
        return (
            <div>
                <div dangerouslySetInnerHTML={{ __html: page.content }} />
                {/* <div>{page.content}</div> */}
            </div>
        );
    }
}

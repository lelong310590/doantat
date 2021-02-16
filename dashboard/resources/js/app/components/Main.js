import React, {Component, Fragment} from 'react';
import Sidebar from "@/components/Sidebar";
import Board from "@/components/Board";

class Main extends Component {
    render() {
        return (
            <div className="app-wrapper">
                <div className="row">
                    <div className="col-xs-12 col-md-9 col-md-push-3">
                        <Board/>
                    </div>
                    <div className="col-xs-12 col-md-3 col-md-pull-9">
                        <Sidebar/>
                    </div>
                </div>
            </div>
        );
    }
}

export default Main;

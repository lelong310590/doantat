import React, {Component, Fragment} from 'react';
import Sidebar from "@/components/Sidebar";
import Board from "@/components/Board";

class Main extends Component {
    render() {
        return (
            <div className="app-wrapper">
                <div className="row">
                    <div className="col-xs-3">
                        <Sidebar/>
                    </div>
                    <div className="col-xs-9">
                        <Board/>
                    </div>
                </div>
            </div>
        );
    }
}

export default Main;

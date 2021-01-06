import React, {Component} from 'react';
import Tabs from '@/components/board/Tabs'
import SubTabs from "@/components/board/SubTabs";
import NumberBoard from "@/components/board/NumberBoard";
import Description from "@/components/board/Description";

class Board extends Component {
    render() {
        return (
            <div className="main-board">
                <Tabs/>
                <SubTabs/>
                <NumberBoard/>
                <Description/>
            </div>
        );
    }
}

export default Board;

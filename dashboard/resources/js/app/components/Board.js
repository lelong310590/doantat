import React, {Component} from 'react';
import {connect} from 'react-redux';
import Tabs from '@/components/board/Tabs'
import SubTabs from "@/components/board/SubTabs";
import NumberBoard from "@/components/board/NumberBoard";
import NumberBoardLarge from "@/components/board/NumberBoardLarge";
import Description from "@/components/board/Description";

class Board extends Component {

    constructor(props) {
        super(props);
        this.state = {
            gameType: 'lo',
            gameSubType: 'lo2so'
        }
    }

    componentDidMount() {
        this.setState({
            gameType: this.props.AppReducer.gameType,
            gameSubType: this.props.AppReducer.gameSubType,
        })
    }

    shouldComponentUpdate(nextProps, nextState) {

        if (this.props.AppReducer.gameType !== nextProps.AppReducer.gameType) {
            this.setState({
                gameType: nextProps.AppReducer.gameType
            })
        }

        if (this.props.AppReducer.gameSubType !== nextProps.AppReducer.gameSubType) {
            this.setState({
                gameSubType: nextProps.AppReducer.gameSubType
            })
        }

        return true
    }

    render() {

        let {gameType, gameSubType} = this.state

        let board = null

        if (gameType === 'lo' & gameSubType === 'lo3so') {
            board = <NumberBoardLarge/>
        } else if (gameType === '3cang') {
            board = <NumberBoardLarge/>
        }else {
            board = <NumberBoard/>
        }

        return (
            <div className="main-board">
                <Tabs/>
                <SubTabs/>
                {board}
                <Description/>
            </div>
        );
    }
}

const mapStateToProps = (state) => {
    return state
}

const mapDispatchToProps = (dispatch) => {
    return {

    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Board);

import React, {Component} from 'react'
import {connect} from 'react-redux'
import * as actions from '@/actions/Index'

class Tabs extends Component {

    constructor(props) {
        super(props)
        this.state = {
            gameType: 'lo'
        }
    }

    componentDidMount() {
        this.setState({
            gameType: this.props.AppReducer.gameType
        })
    }

    shouldComponentUpdate(nextProps, nextState) {

        if (this.props.AppReducer.gameType !== nextProps.AppReducer.gameType) {
            this.setState({
                gameType: nextProps.AppReducer.gameType
            })
        }

        return true
    }

    changeGameType = (value) => {
        this.props.changeGameType(value)
    }

    render() {

        let {gameType} = this.state

        return (
            <div className="play-type-wrapper d-flex justify-start align-center">
                <div className={gameType === 'lo' ? 'play-type-item active' : 'play-type-item'}
                    onClick={() => this.changeGameType('lo')}
                >
                    Đánh lô
                </div>
                <div className={gameType === 'de' ? 'play-type-item active' : 'play-type-item'}
                     onClick={() => this.changeGameType('de')}
                >
                    Đánh đề
                </div>
                <div className={gameType === '3cang' ? 'play-type-item active' : 'play-type-item'}
                     onClick={() => this.changeGameType('3cang')}
                >
                    3 càng
                </div>
                <div className={gameType === 'loxien' ? 'play-type-item active' : 'play-type-item'}
                     onClick={() => this.changeGameType('loxien')}
                >
                    Lô xiên
                </div>
            </div>
        );
    }
}

const mapStateToProps = (state) => {
    return state
}

const mapDispatchToProps = (dispatch) => {
    return {
        changeGameType: (value) => {
            dispatch(actions.handleChangeGameType(value))
        }
    }
}

export default connect(mapStateToProps, mapDispatchToProps) (Tabs);

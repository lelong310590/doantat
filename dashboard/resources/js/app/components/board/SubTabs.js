import React, {Component, Fragment} from 'react'
import {connect} from 'react-redux'
import * as actions from '@/actions/Index'

class SubTabs extends Component {

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

    changeGameSubType = (value) => {
        this.props.changeGameSubType(value)
    }

    render() {

        let {gameType, gameSubType} = this.state

        return (
            <div className="sub-tab-wrappers d-flex justify-start align-center mt-15">
                {gameType === 'lo' &&
                    <Fragment>
                        <div className={gameSubType === 'lo2so' ? 'sub-tab-item active' : 'sub-tab-item'}
                            onClick={() => this.changeGameSubType('lo2so')}
                        >
                            Lô 2 Số
                        </div>
                        <div className={gameSubType === 'lo3so' ? 'sub-tab-item active' : 'sub-tab-item'}
                             onClick={() => this.changeGameSubType('lo3so')}
                        >
                            Lô 3 Số
                        </div>
                    </Fragment>
                }

                {gameType === 'de' &&
                    <Fragment>
                        <div className="sub-tab-item active">
                            Đề đặt biệt
                        </div>
                    </Fragment>
                }

                {gameType === '3cang' &&
                    <Fragment>
                        <div className="sub-tab-item active">
                            3 Càng
                        </div>
                    </Fragment>
                }

                {gameType === 'loxien' &&
                    <Fragment>
                        <div className={gameSubType === 'loxien2' ? 'sub-tab-item active' : 'sub-tab-item'}
                             onClick={() => this.changeGameSubType('loxien2')}
                        >
                            Xiên 2
                        </div>
                        <div className={gameSubType === 'loxien3' ? 'sub-tab-item active' : 'sub-tab-item'}
                             onClick={() => this.changeGameSubType('loxien3')}
                        >
                            Xiên 3
                        </div>
                        <div className={gameSubType === 'loxien4' ? 'sub-tab-item active' : 'sub-tab-item'}
                             onClick={() => this.changeGameSubType('loxien4')}
                        >
                            Xiên 4
                        </div>
                    </Fragment>
                }
            </div>
        )
    }
}

const mapStateToProps = (state) => {
    return state
}

const mapDispatchToProps = (dispatch) => {
    return {
        changeGameSubType: (value) => {
            dispatch(actions.handleChangeGameSubType(value))
        }
    }
}

export default connect(mapStateToProps, mapDispatchToProps) (SubTabs)

import React, {Component} from 'react';
import {connect} from 'react-redux';

class Sidebar extends Component {

    constructor(props) {
        super(props);
        this.state = {
            gameType: 'lo',
            gameSubType: 'lo2so',
            selectedNumber: [],
            price: 0
        }
    }

    componentDidMount() {
        this.setState({
            gameType: this.props.AppReducer.gameType,
            gameSubType: this.props.AppReducer.gameSubType,
            selectedNumber: this.props.AppReducer.selectedNumber,
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

        if (this.props.AppReducer.selectedNumber !== nextProps.AppReducer.selectedNumber) {
            this.setState({
                selectedNumber: nextProps.AppReducer.selectedNumber
            })
        }

        return true
    }

    changePrice = (e) => {
        // console.log('e: ', e.target.value)
        // console.log('valid: ', e.target.validity.valid)
        let price = e.target.validity.valid ? e.target.value : 0
        this.setState({
            price
        })
    }

    render() {

        let {gameType, gameSubType, selectedNumber, price} = this.state

        let constPrice = 1;
        if (gameType === 'lo') {
            constPrice = 23000
        }

        let constPrize = 0;
        if (gameType === 'lo' && gameSubType === 'lo2so') {
            constPrize = 81000
        } else if (gameType === 'lo' && gameSubType === 'lo3so') {
            constPrize = 900000
        } else if (gameType === 'de') {
            constPrize = 95
        } else if (gameType === '3cang') {
            constPrize = 900
        } else if (gameType === 'loxien' && gameSubType === 'loxien2') {
            constPrize = 17
        } else if (gameType === 'loxien' && gameSubType === 'loxien3') {
            constPrize = 65
        } else if (gameType === 'loxien' && gameSubType === 'loxien4') {
            constPrize = 250
        }

        let translateGameType = 'Đánh đề'
        let translateGameSubType = ''

        switch (gameType) {
            case 'lo':
                translateGameType = 'Đánh lô'
                break
            case '3cang':
                translateGameType = '3 Càng'
                break
            case 'loxien':
                translateGameType = 'Lô Xiên'
                break
            default:
                translateGameType = 'Đánh đề'
        }

        switch (gameSubType) {
            case 'lo2so':
                translateGameSubType = 'Lô 2 số'
                break
            case 'lo3so':
                translateGameSubType = 'Lô 3 số'
                break
            case 'loxien2':
                translateGameSubType = 'Lô Xiên 2'
                break
            case 'loxien3':
                translateGameSubType = 'Lô Xiên 3'
                break
            case 'loxien4':
                translateGameSubType = 'Lô Xiên 4'
                break
            default:
                translateGameSubType = ''
        }

        let total = selectedNumber.length * price * constPrice
        let prize = selectedNumber.length === 0 ? 0 : constPrize*price

        return (
            <div className="right-panel">
                    <div className="head-panel">
                        <p>{translateGameType}</p>
                    </div>
                    <div className="content-panel">
                        <p className="cat-lode">{translateGameSubType}</p>

                        <div className="picked-number d-flex justify-start align-center">
                            {_.map(selectedNumber, (v, i) => (
                                <div className="picked-number-item" key={i}>
                                    {v}
                                </div>
                            ))}
                        </div>

                        <div className="form-group">
                            <div className="info-amount">Số {gameType ===  'lo' || gameType === 'loxien' ? 'điểm' : 'tiền'} trên 1 con</div>
                            <input type="text"
                                   className="tienmotcon form-new-2 form-control"
                                   value={price}
                                   pattern="[0-9]*"
                                   onChange={this.changePrice}
                            />
                        </div>
                        <div className="form-group">
                            <div className="info-amount">Tổng tiền đánh (đ)</div>
                            <p>
                                <b>{total}</b>
                            </p>
                        </div>
                        <div className="form-group">
                            Số tiền thắng / 1 con
                            <p><b>{prize}</b></p>
                        </div>
                    </div>
                    <button className="submit text-uppercase">
                        Đặt cược
                    </button>
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

export default connect(mapStateToProps, mapDispatchToProps)(Sidebar);

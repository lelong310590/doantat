import React, {Component} from 'react'
import {connect} from 'react-redux'

class Description extends Component {

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

        let description = '';

        switch (gameType) {
            case 'lo':
                if (gameSubType === 'lo2so') {
                    description = 'Đánh 2 chữ số cuối trong lô 27 giải ( chỉ cần thanh toán cho 22 giải ). Thắng gấp 81 lần, nếu số đó về N lần thì tính kết quả x N lần. Ví dụ: đánh lô 79 - 1 con 1k, Tổng thanh toán: 1k x 22 = 22k. Nếu trong lô có 2 chữ số cuối là 79 thì Tiền thắng: 1k x 81 = 81k, nếu có N lần 2 chữ số cuối là 79 thì Tiền thắng là: 1k x 81 x N'
                } else {
                    description = 'Đánh 3 chữ số cuối trong lô 23 giải. Thắng gấp 900 lần, nếu số đó về N lần thì tính kết quả x N lần. Ví dụ: đánh lô 789 - 1 con 1k, Tổng thanh toán: 1k x 23 = 23k. Nếu trong lô có 3 chữ số cuối là 789 thì Tiền thắng: 1k x 900 = 900k, nếu có N lần 3 chữ số cuối là 789 thì Tiền thắng là: 1k x 900 x N '
                }
                break
            case 'de':
                description = 'Đánh lô giải 7 ( có 4 giải, thanh toán đủ ). Thắng gấp 95 lần. Ví dụ : đánh 1k cho số 79, Tổng thanh toán: 1k x 4 =4k. Nếu trong lô giải 7 có 1 số 79 thì Tiền thắng: 1k x 95 = 95k. '
                break
            case '3cang':
                description = 'Đánh 3 chữ số cuối của giải ĐB. Thắng gấp 900 lần. Ví dụ: đánh 1k cho số 879, Tổng thanh toán: 1k. Nếu giải ĐB là xx879 thì Tiền thắng: 1k x 900 = 900K '
            case 'loxien':
                if (gameSubType === 'loxien2') {
                    description = 'Xiên 2 của 2 chữ số cuối trong lô 27 giải. Thắng gấp 17 lần. Ví dụ : đánh 1k cho xiên 11+13, Tổng thanh toán: 1k. Nếu trong lô có "2 chữ số cuối là 11 và 2 chữ số cuối là 13" thì Tiền thắng: 1k x 17 = 17k '
                } else if (gameSubType === 'loxien3') {
                    description = 'Xiên 3 của 2 chữ số cuối trong lô 27 giải. Thắng gấp 65 lần. Ví dụ : đánh 1k cho xiên 11+13+15, Tổng thanh toán: 1k. Nếu trong lô có 2 chữ số cuối là 11,13,15 thì Tiền thắng: 1k x 65 = 65k '
                } else {
                    description = 'Xiên 4 của 2 chữ số cuối trong lô 27 giải. Thắng gấp 250 lần. Ví dụ : đánh 1k cho xiên 11+13+15+20, Tổng thanh toán: 1k. Nếu trong lô có 2 chữ số cuối là 11,13,15,20 thì Tiền thắng: 1k x 250 = 250k '
                }
                break
            default:
                description = 'Đánh 2 chữ số cuối trong lô 27 giải ( chỉ cần thanh toán cho 22 giải ). Thắng gấp 81 lần, nếu số đó về N lần thì tính kết quả x N lần. Ví dụ: đánh lô 79 - 1 con 1k, Tổng thanh toán: 1k x 22 = 22k. Nếu trong lô có 2 chữ số cuối là 79 thì Tiền thắng: 1k x 81 = 81k, nếu có N lần 2 chữ số cuối là 79 thì Tiền thắng là: 1k x 81 x N'
        }

        return (
            <div className="board-description">
                {description}
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

export default connect(mapStateToProps, mapDispatchToProps) (Description)

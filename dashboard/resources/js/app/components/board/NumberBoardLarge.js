import React, {Component, Fragment} from 'react'
import {connect} from 'react-redux'

class NumberBoardLarge extends Component {
    render() {

        let numberItem = [];
        let i = -1;
        _.times(100, () => {
            i++;
            numberItem.push(
                <div className="number-item">
                    <div className="number-item-inner">
                        {i < 10 ? '0' + i.toString() : i.toString()}
                    </div>
                </div>
            )
        })

        return (
            <Fragment>
                <div className="number-board-range-select">
                    <div className="number-board-range-item">
                        000 - 099
                    </div>
                    <div className="number-board-range-item">
                        100 - 199
                    </div>
                    <div className="number-board-range-item">
                        200 - 299
                    </div>
                    <div className="number-board-range-item">
                        300 - 399
                    </div>
                    <div className="number-board-range-item">
                        400 - 499
                    </div>
                    <div className="number-board-range-item">
                        500 - 599
                    </div>
                    <div className="number-board-range-item">
                        600 - 699
                    </div>
                    <div className="number-board-range-item">
                        700 - 799
                    </div>
                    <div className="number-board-range-item">
                        800 - 899
                    </div>
                    <div className="number-board-range-item">
                        900 - 999
                    </div>
                </div>
                <div className="number-board-wrapper">
                    {numberItem}
                </div>
            </Fragment>
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

export default connect(mapStateToProps, mapDispatchToProps)(NumberBoardLarge)

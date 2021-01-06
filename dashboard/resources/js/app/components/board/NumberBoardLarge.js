import React, {Component, Fragment} from 'react'
import {connect} from 'react-redux'
import _ from 'lodash'

class NumberBoardLarge extends Component {
    render() {
        let rangeArray = ['000 - 099', '100 - 199', '200 - 299', '300 - 399', '400 - 499', '500 - 599', '600 - 699', '700 - 799', '800 - 899', '900 - 999']
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
                    {_.map(rangeArray, (v, i) => {
                        return (
                            <div className="number-board-range-item" key={i}>
                                <div className="number-board-range-item-inner">
                                    {v}
                                </div>
                            </div>
                        )
                    })}

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

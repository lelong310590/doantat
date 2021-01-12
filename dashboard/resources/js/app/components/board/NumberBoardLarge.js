import React, {Component, Fragment} from 'react'
import {connect} from 'react-redux'
import _ from 'lodash'
import * as actions from '@/actions/Index'

class NumberBoardLarge extends Component {

    constructor(props) {
        super(props)
        this.state = {
            rangeArray: ['000 - 099', '100 - 199', '200 - 299', '300 - 399', '400 - 499', '500 - 599', '600 - 699', '700 - 799', '800 - 899', '900 - 999'],
            start: -1,
            limitNumber: 10,
            selectedNumber: []
        }
    }

    componentDidMount() {
        this.setState({
            limitNumber: this.props.AppReducer.limitNumber,
            selectedNumber: this.props.AppReducer.selectedNumber,
        })
    }

    shouldComponentUpdate(nextProps, nextState) {

        if (this.props.AppReducer.limitNumber !== nextProps.AppReducer.limitNumber) {
            this.setState({
                limitNumber: nextProps.AppReducer.limitNumber
            })
        }

        if (this.props.AppReducer.selectedNumber !== nextProps.AppReducer.selectedNumber) {
            this.setState({
                selectedNumber: nextProps.AppReducer.selectedNumber
            })
        }

        return true
    }

    changeRange = (start) => {
        this.setState({start})
    }

    pickNumber = (value) => {
        let {limitNumber, selectedNumber} = this.state

        let idx = _.findIndex(selectedNumber, (o) => {
            return o === value
        })
        if (idx >= 0) {
            _.remove(selectedNumber, function(n) {
                return n === value;
            });
        } else {
            if (selectedNumber.length === limitNumber) {
                alert('Bạn chỉ được  chọn tối đa ' + limitNumber + ' số')
                return false
            }
            selectedNumber.push(value)
        }

        this.props.handlePickNumber(selectedNumber)
    }

    render() {
        let {rangeArray, start, selectedNumber} = this.state
        let numberItem = []
        let i = start
        _.times(100, () => {
            i++
            numberItem.push(i)
        })

        return (

            <Fragment>
                <div className="number-board-range-select">
                    {_.map(rangeArray, (v, i) => {
                        return (
                            <div className="number-board-range-item" key={i}
                                onClick={() => this.changeRange(i*100 - 1)}
                            >
                                <div className={i*100 - 1 === start ? 'number-board-range-item-inner active' : 'number-board-range-item-inner'}>
                                    {v}
                                </div>
                            </div>
                        )
                    })}

                </div>
                <div className="number-board-wrapper">
                    {_.map(numberItem, (i,v) => {

                        let render = ''
                        if (i < 10) {
                            render = '00' + i.toString()
                        } else if (i >= 10 && i < 100) {
                            render = '0' + i.toString()
                        } else {
                            render = i.toString()
                        }

                        let idx = _.findIndex(selectedNumber, (o) => {
                            return o === render
                        })

                        return (
                            <div
                                className={idx >= 0 ? 'number-item active' : 'number-item'}
                                key={v}
                                onClick={() => this.pickNumber(render)}
                            >
                                <div className="number-item-inner">
                                    {render}
                                </div>
                            </div>
                        )
                    })}
                </div>
            </Fragment>
        )
    }
}

const mapStateToProps = (state) => {
    return state
}

const mapDispatchToProps = (dispatch) => {
    return {
        handlePickNumber: (value) => {
            dispatch(actions.handlePickNumber(value))
        }
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(NumberBoardLarge)

import React, {Component} from 'react';
import _ from 'lodash';
import {connect} from 'react-redux';
import * as actions from '@/actions/Index'

class NumberBoard extends Component {

    constructor(props) {
        super(props);
        this.state = {
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
        let {selectedNumber} = this.state
        let numberItem = [];
        let i = -1;
        _.times(100, () => {
            i++;
            numberItem.push(i)
        })

        return (
            <div className="number-board-wrapper">
                {_.map(numberItem,  (i, v) => {

                    let idx = _.findIndex(selectedNumber, (o) => {
                        let value = i < 10 ? '0' + i.toString() : i.toString()
                        return o === value
                    })

                    return (
                        <div
                            className={idx >= 0 ? 'number-item active' : 'number-item'}
                            key={i}
                            onClick={() => this.pickNumber(i < 10 ? '0' + i.toString() : i.toString())}
                        >
                            <div className="number-item-inner">
                                {i < 10 ? '0' + i.toString() : i.toString()}
                            </div>
                        </div>
                    )
                })}
            </div>
        );
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

export default connect(mapStateToProps, mapDispatchToProps) (NumberBoard);

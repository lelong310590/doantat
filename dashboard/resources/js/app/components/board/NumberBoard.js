import React, {Component} from 'react';
import _ from 'lodash';

class NumberBoard extends Component {

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
            <div className="number-board-wrapper">
                {numberItem}
            </div>
        );
    }
}

export default NumberBoard;

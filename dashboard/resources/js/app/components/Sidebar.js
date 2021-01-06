import React, {Component} from 'react';

class Sidebar extends Component {
    render() {
        return (
            <div className="right-panel">
                    <div className="head-panel">
                        <p>Đánh đề</p>
                    </div>
                    <div className="content-panel">
                        <p className="cat-lode">Đánh lô</p>
                        <div className="form-group">
                            <div className="info-amount">Số tiền trên 1 con (K)</div>
                            <input type="text" id="tienmotcon" className="tienmotcon form-new-2 form-control"
                                   placeholder="0"/>
                        </div>
                        <div className="form-group">
                            <div className="info-amount">Tổng tiền đánh (K)</div>
                            <input type="text" name="amount" placeholder="0" onKeyUp="FormatNumber(this)"
                                   className="format_currency tongtiendanh form-new-2 form-control"
                                   id="tongtiendanh"/>
                        </div>
                        <div className="form-group">
                            Số tiền thắng / 1 con
                        </div>
                    </div>
                    <button className="submit text-uppercase">
                        Đặt cược
                    </button>
                </div>
        );
    }
}

export default Sidebar;

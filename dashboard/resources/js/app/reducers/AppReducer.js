import _ from 'lodash';
import * as types from '@/const/ActionTypes';

let initialState = {
    gameType: 'lo',
    gameSubType: 'lo2so',
    limitNumber: 10
};

let AppReducer = (state = initialState, action) => {
    switch (action.type) {
        case types.CHANGE_GAME_TYPE:

            let gameType = action.payload
            let gameSubType = state.gameSubType
            let limitNumber = state.limitNumber

            if (gameType === 'lo') {
                gameSubType = 'lo2so'
                limitNumber = 10
            } else if (gameType === 'loxien') {
                gameSubType = 'loxien2'
                limitNumber = 2
            }

            return {
                ...state,
                gameType,
                gameSubType,
                limitNumber
            };

        case types.CHANGE_GAME_SUB_TYPE:

            if (action.payload == 'loxien2') {
                limitNumber = 2
            } else if (action.payload == 'loxien3') {
                limitNumber = 3
            } else if (action.payload == 'loxien4') {
                limitNumber = 4
            } else {
                limitNumber = 10
            }

            return {
                ...state,
                gameSubType: action.payload,
                limitNumber
            };
        default:
            return state;
    }
}

export default AppReducer

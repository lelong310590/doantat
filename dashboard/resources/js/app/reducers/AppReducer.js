import _ from 'lodash';
import * as types from '@/const/ActionTypes';

let initialState = {
    selectedNumber: [],
    gameType: 'lo',
    gameSubType: 'lo2so',
    limitNumber: 10
};

let AppReducer = (state = initialState, action) => {

    let payload = action.payload
    let gameType = action.payload
    let gameSubType = state.gameSubType
    let limitNumber = state.limitNumber

    switch (action.type) {
        case types.CHANGE_GAME_TYPE:

            if (gameType === 'lo') {
                gameSubType = 'lo2so'
                limitNumber = 10
            } else if (gameType === 'loxien') {
                gameSubType = 'loxien2'
                limitNumber = 2
            } else {
                gameSubType = ''
            }

            return {
                ...state,
                gameType,
                gameSubType,
                limitNumber,
                selectedNumber: []
            };

        case types.CHANGE_GAME_SUB_TYPE:

            if (payload === 'loxien2') {
                limitNumber = 2
            } else if (payload === 'loxien3') {
                limitNumber = 3
            } else if (payload === 'loxien4') {
                limitNumber = 4
            } else {
                limitNumber = 10
            }

            return {
                ...state,
                gameSubType: action.payload,
                limitNumber,
                selectedNumber: []
            };

        case types.PICK_NUMBER:
            return {
                ...state,
                selectedNumber: action.payload
            }

        default:
            return state;
    }
}

export default AppReducer

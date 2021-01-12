import * as types from '@/const/ActionTypes'

export const handleChangeGameType = (value) => ({
    type: types.CHANGE_GAME_TYPE,
    payload: value
})

export const handleChangeGameSubType = (value) => ({
    type: types.CHANGE_GAME_SUB_TYPE,
    payload: value
})

export const handlePickNumber = (value) => ({
    type: types.PICK_NUMBER,
    payload: value
})

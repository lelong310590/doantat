import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux';
import {createStore, compose, applyMiddleware} from 'redux';
import MainReducer from "@/reducers/MainReducer";
import Main from "@/components/Main";

const store = createStore(
    MainReducer,
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);

if (document.getElementById('lode-elem')) {
    ReactDOM.render(
        <Provider store={store}>
            <Main />
        </Provider>
        , document.getElementById('lode-elem'));
}

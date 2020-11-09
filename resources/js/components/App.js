import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route} from 'react-router-dom'
import Crime from './Crime';


class App extends Component {
render () {
    return (
        <BrowserRouter>
        <Route patch="/test" component={Crime}></Route>
        </BrowserRouter>
    )
}
}
ReactDOM.render(<App/>, document.getElementById('app'))

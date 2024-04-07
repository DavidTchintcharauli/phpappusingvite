import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import Home from './pages/Home';
import NotFound from './pages/NotFound';

function App() {
  return (
    <Router>
      <div>
        <Switch>
          <Route exact path="/" component={Home}/>
          <Route component={NotFound} />
        </Switch>
      </div>
    </Router>
  )
}

export default App

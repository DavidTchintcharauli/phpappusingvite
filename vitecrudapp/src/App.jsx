import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from './pages/Home'
import NotFound from './pages/NotFound'

function App() {
  return (
    <Router>
      <div>
        <Routes>
          <Route exact path="/" component={Home}/>
          <Route component={NotFound} />
        </Routes>
      </div>
    </Router>
  )
}

export default App;
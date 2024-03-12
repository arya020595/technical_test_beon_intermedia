import { Route, RouterProvider, createRoutesFromElements } from "react-router";
import { createBrowserRouter } from "react-router-dom";
// import "./App.css";
import NotFound from "./NotFound";
import AuthLayout from "./components/AuthLayout";
import Error from "./components/Error";
import Layout from "./components/Layout";
import Home from "./pages/Home";
import House from "./pages/House";
import HouseForm from "./pages/HouseForm";
import Login, {
  action as loginAction,
  loader as loginLoader,
} from "./pages/Login";
import Occupant, { loader as occupantLoader } from "./pages/Occupant";
import OccupantForm from "./pages/OccupantForm";
import Payment from "./pages/Payment";
import PaymentForm from "./pages/PaymentForm";
import Register, {
  action as registerAction,
  loader as registerLoader,
} from "./pages/Register";
import Report from "./pages/Report";
import ReportForm from "./pages/ReportForm";
import User, { action as userAction, loader as userloader } from "./pages/User";

function App() {
  const router = createBrowserRouter(
    createRoutesFromElements(
      <Route path="/">
        <Route element={<Layout />}>
          <Route index element={<Home />} errorElement={<Error />} />
          <Route
            path="user"
            element={<User />}
            loader={userloader}
            action={userAction}
            errorElement={<Error />}
          />
          <Route
            path="occupants"
            element={<Occupant />}
            loader={occupantLoader}
            errorElement={<Error />}
          />
          <Route
            path="occupant-form"
            element={<OccupantForm />}
            errorElement={<Error />}
          />
          <Route path="houses" element={<House />} errorElement={<Error />} />
          <Route
            path="house-form"
            element={<HouseForm />}
            errorElement={<Error />}
          />
          <Route
            path="payments"
            element={<Payment />}
            errorElement={<Error />}
          />
          <Route
            path="payment-form"
            element={<PaymentForm />}
            errorElement={<Error />}
          />
          <Route path="reports" element={<Report />} errorElement={<Error />} />
          <Route
            path="report-form"
            element={<ReportForm />}
            errorElement={<Error />}
          />
        </Route>
        <Route element={<AuthLayout />}>
          <Route
            path="login"
            element={<Login />}
            loader={loginLoader}
            action={loginAction}
            errorElement={<Error />}
          />
          <Route
            path="register"
            element={<Register />}
            loader={registerLoader}
            action={registerAction}
            errorElement={<Error />}
          />
        </Route>
        <Route path="*" element={<NotFound />} />
      </Route>
    )
  );

  return <RouterProvider router={router} />;
}

export default App;

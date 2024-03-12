import { Button, Card, Form as FormBootstrap } from "react-bootstrap";
import { Form, Link, redirect, useNavigation } from "react-router-dom";
import { createUser } from "../api";
import "../assets/Register.css";

export async function action({ request }: any) {
  const data = Object.fromEntries(await request.formData());

  const response = await createUser(
    data.name,
    data.email,
    data.password,
    data.password_confirmation
  );

  localStorage.setItem("accessToken", response.accessToken);
  localStorage.setItem("user", JSON.stringify(response.user));

  return response;
}

export async function loader({ request }: any) {
  const accessToken = localStorage.getItem("accessToken");

  if (accessToken == null || accessToken === "undefined") {
    return null;
  }

  return redirect("/");
}

function Register() {
  const navigation: any = useNavigation();

  return (
    <Card border="Secondary">
      <Card.Title className="mt-3 text-dark">REGISTER</Card.Title>
      <Card.Body>
        <Form replace method="post">
          <>
            <FormBootstrap.Group className="mb-3">
              <FormBootstrap.Control
                name="name"
                type="text"
                placeholder="Name"
              />
            </FormBootstrap.Group>
            <FormBootstrap.Group className="mb-3">
              <FormBootstrap.Control
                name="email"
                type="email"
                placeholder="Email"
              />
            </FormBootstrap.Group>
            <FormBootstrap.Group className="mb-3">
              <FormBootstrap.Control
                name="password"
                type="password"
                placeholder="Password"
              />
            </FormBootstrap.Group>
            <FormBootstrap.Group className="mb-3">
              <FormBootstrap.Control
                name="password_confirmation"
                type="password"
                placeholder="Confirm Password"
              />
            </FormBootstrap.Group>
            <div className="d-grid gap-3">
              <Button
                type="submit"
                disabled={navigation.state === "submitting"}
                variant="secondary">
                {navigation.state === "submitting"
                  ? "Registering in..."
                  : "Register"}
              </Button>
              <Link className="text-secondary text-decoration-none" to="/login">
                Login
              </Link>
            </div>
          </>
        </Form>
      </Card.Body>
    </Card>
  );
}

export default Register;

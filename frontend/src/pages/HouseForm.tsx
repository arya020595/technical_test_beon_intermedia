import {
  Button,
  Col,
  Container,
  Form as FormBootstrap,
  Row,
} from "react-bootstrap";
import { Form, useNavigation } from "react-router-dom";

function HouseForm() {
  const navigation: any = useNavigation();

  return (
    <div className="text-center">
      <h4>House Form</h4>

      <Container>
        <Row xs={1} md={2} lg={3} className="justify-content-center">
          <Col>
            <Form replace method="post">
              <>
                <FormBootstrap.Group className="mb-3">
                  <FormBootstrap.Control name="id" type="hidden" />
                </FormBootstrap.Group>
                <FormBootstrap.Group className="mb-3">
                  <FormBootstrap.Control
                    name="name"
                    type="text"
                    placeholder="House Name"
                  />
                </FormBootstrap.Group>
                <FormBootstrap.Group className="mb-3">
                  <FormBootstrap.Select name="occupant">
                    <option value="">Select Occupant</option>
                    <option value="occupant1">Occupant 1</option>
                    <option value="occupant2">Occupant 2</option>
                    {/* Add more options as needed */}
                  </FormBootstrap.Select>
                </FormBootstrap.Group>

                <FormBootstrap.Group className="mb-3">
                  <FormBootstrap.Select name="is_inhabited">
                    <option value="">Is Inhabited?</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                  </FormBootstrap.Select>
                </FormBootstrap.Group>

                <FormBootstrap.Group className="mb-3">
                  <FormBootstrap.Select name="is_rented">
                    <option value="">Is Rented?</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                  </FormBootstrap.Select>
                </FormBootstrap.Group>
              </>

              <div className="d-grid gap-3">
                <Button
                  type="submit"
                  disabled={navigation.state === "submitting"}
                  variant="secondary">
                  {navigation.state === "submitting"
                    ? "Submitting in..."
                    : "Submit"}
                </Button>
              </div>
            </Form>
          </Col>
        </Row>
      </Container>
    </div>
  );
}

export default HouseForm;

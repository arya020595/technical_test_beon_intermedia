import {
  Button,
  Col,
  Container,
  Form as FormBootstrap,
  Row,
} from "react-bootstrap";
import { Form, useNavigation } from "react-router-dom";

function OccupantForm() {
  const navigation: any = useNavigation();

  return (
    <div className="text-center">
      <h4>Occupant Form</h4>

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
                    placeholder="Occupant Name"
                  />
                </FormBootstrap.Group>
                <FormBootstrap.Group className="mb-3">
                  <FormBootstrap.Control
                    name="image_ktp_url"
                    type="text"
                    placeholder="Image KTP URL"
                  />
                </FormBootstrap.Group>
                <FormBootstrap.Group className="mb-3">
                  <FormBootstrap.Select name="occupant_status">
                    <option value="">Select Occupant Status</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    {/* Add more options as needed */}
                  </FormBootstrap.Select>
                </FormBootstrap.Group>
                <FormBootstrap.Group className="mb-3">
                  <FormBootstrap.Control
                    name="phone_number"
                    type="text"
                    placeholder="Phone Number"
                  />
                </FormBootstrap.Group>
                <FormBootstrap.Group className="mb-3">
                  <FormBootstrap.Select name="is_married">
                    <option value="">Is Married?</option>
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

export default OccupantForm;

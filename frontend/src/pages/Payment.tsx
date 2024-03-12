import { Button, Table } from "react-bootstrap";
import { useLoaderData } from "react-router-dom";
import { getPayments } from "../api";
import requireAuth from "../utils";

export async function loader({ request }: any) {
  await requireAuth(request);

  return getPayments();
}

function Payment() {
  const paymentData: any = useLoaderData();

  console.log(paymentData);

  const handleCreate = () => {
    // Implement your create logic here
    console.log("Create clicked");
  };

  const handleEdit = (id: any) => {
    // Implement your edit logic here with the payment id
    console.log(`Edit clicked for payment with ID ${id}`);
  };

  const handleDelete = (id: any) => {
    // Implement your delete logic here with the payment id
    console.log(`Delete clicked for payment with ID ${id}`);
  };

  return (
    <div>
      <Table striped bordered hover>
        <thead>
          <tr>
            <th>ID</th>
            <th>Occupant Name</th>
            <th>House Name</th>
            <th>Dues Type</th>
            <th>Billing Start Date</th>
            <th>Billing End Date</th>
            <th>Payment Date</th>
            <th>Payment Amount</th>
            <th>Is Paid?</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {paymentData?.data.map((payment: any) => (
            <tr key={payment.id}>
              <td>{payment.id}</td>
              <td>{payment.occupant.name}</td>
              <td>{payment.house.name}</td>
              <td>{payment.dues_type.dues_description}</td>
              <td>{payment.billing_start_date}</td>
              <td>{payment.billing_end_date}</td>
              <td>{payment.payment_date}</td>
              <td>{payment.payment_amount}</td>
              <td>{payment.is_paid ? "True" : "False"}</td>
              <td>
                <Button variant="success" size="sm" onClick={handleCreate}>
                  Create
                </Button>{" "}
                <Button
                  variant="info"
                  size="sm"
                  onClick={() => handleEdit(payment.id)}>
                  Edit
                </Button>{" "}
                <Button
                  variant="danger"
                  size="sm"
                  onClick={() => handleDelete(payment.id)}>
                  Delete
                </Button>
              </td>
            </tr>
          ))}
        </tbody>
      </Table>
    </div>
  );
}

export default Payment;

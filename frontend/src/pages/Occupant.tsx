import { Button, Table } from "react-bootstrap";
import { useLoaderData } from "react-router-dom";
import { getOccupants } from "../api";
import requireAuth from "../utils";

export async function loader({ request }: any) {
  await requireAuth(request);

  return getOccupants();
}

function Occupant() {
  const occupantData: any = useLoaderData();

  const handleCreate = () => {
    // Implement your create logic here
    console.log("Create clicked");
  };

  const handleEdit = (id: any) => {
    // Implement your edit logic here with the occupant id
    console.log(`Edit clicked for occupant with ID ${id}`);
  };

  const handleDelete = (id: any) => {
    // Implement your delete logic here with the occupant id
    console.log(`Delete clicked for occupant with ID ${id}`);
  };

  return (
    <div>
      <Table striped bordered hover>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image KTP</th>
            <th>Occupant Status</th>
            <th>Phone Number</th>
            <th>Is Married?</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {occupantData?.data.map((occupant: any) => (
            <tr key={occupant.id}>
              <td>{occupant.id}</td>
              <td>{occupant.name}</td>
              <td>{occupant.image_ktp_url}</td>
              <td>{occupant.occupant_status}</td>
              <td>{occupant.phone_number}</td>
              <td>{occupant.is_married ? "True" : "False"}</td>
              <td>
                <Button variant="success" size="sm" onClick={handleCreate}>
                  Create
                </Button>{" "}
                <Button
                  variant="info"
                  size="sm"
                  onClick={() => handleEdit(occupant.id)}>
                  Edit
                </Button>{" "}
                <Button
                  variant="danger"
                  size="sm"
                  onClick={() => handleDelete(occupant.id)}>
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

export default Occupant;

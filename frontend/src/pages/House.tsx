import { Button, Table } from "react-bootstrap";
import { useLoaderData } from "react-router-dom";
import { getHouses } from "../api";
import requireAuth from "../utils";

export async function loader({ request }: any) {
  await requireAuth(request);

  return getHouses();
}

function House() {
  const houseData: any = useLoaderData();

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
            <th>Occupant Name</th>
            <th>Is Rented</th>
            <th>Is Inhabited</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {houseData?.data.map((house: any) => (
            <tr key={house.id}>
              <td>{house.id}</td>
              <td>{house.name}</td>
              <td>{house.occupant.name}</td>
              <td>{house.is_rented}</td>
              <td>{house.is_inhabited}</td>
              <td>
                <Button variant="success" size="sm" onClick={handleCreate}>
                  Create
                </Button>{" "}
                <Button
                  variant="info"
                  size="sm"
                  onClick={() => handleEdit(house.occupant_id)}>
                  Edit
                </Button>{" "}
                <Button
                  variant="danger"
                  size="sm"
                  onClick={() => handleDelete(house.occupant_id)}>
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

export default House;

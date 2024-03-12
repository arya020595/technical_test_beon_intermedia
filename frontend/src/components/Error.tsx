import { Button } from "react-bootstrap";
import { useLocation, useNavigate, useRouteError } from "react-router-dom";

function Error() {
  const errorResponse: any = useRouteError();
  const location = useLocation();
  const currentPathname = location.pathname;
  let { error, messages } = errorResponse;

  const navigate = useNavigate();
  const handleRefresh = () => {
    navigate(currentPathname);
  };

  const titleCase = (str: string) => {
    let newStr = str
      .toLowerCase()
      .replace(/./, (x) => x.toUpperCase())
      .replace(/[^']\b\w/g, (y) => y.toUpperCase());

    return newStr;
  };

  const textPathname = titleCase(currentPathname.replace(/-/g, " ").slice(1));

  return (
    <div style={{ textAlign: "center", padding: "50px" }}>
      <h1>{error}</h1>
      <ul style={{ listStyle: "none", padding: 0 }}>
        {messages &&
          Object.entries(messages).map(([field, fieldErrors]: any) => (
            <li key={field}>
              <b>{titleCase(field)}:</b> {fieldErrors.join(", ")}
            </li>
          ))}
      </ul>
      <p>Please fix the issues and try again.</p>
      <Button variant="secondary" onClick={handleRefresh}>
        Back to {textPathname}
      </Button>
    </div>
  );
}

export default Error;

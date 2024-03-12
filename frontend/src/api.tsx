import { redirect } from "react-router";

export async function authLogin(email: string, password: string) {
  const baseURL = import.meta.env.VITE_BASE_URL;
  const url = `${baseURL}/api/auth/login`;

  try {
    const response = await fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        email,
        password,
      }),
    });

    if (!response.ok) {
      throw await response.json();
    }

    return await response.json();
  } catch (error) {
    console.error("Error auth login:", error);
    throw error; // Rethrow the error for the calling code to handle
  }
}

export async function createUser(
  name: string,
  email: string,
  password: string,
  password_confirmation: string
) {
  try {
    const baseURL = import.meta.env.VITE_BASE_URL;
    const url = `${baseURL}/api/users/`;

    const response = await fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        name,
        email,
        password,
        password_confirmation,
      }),
    });

    if (!response.ok) {
      throw await response.json();
    }

    const data = await response.json();

    return data;
  } catch (error) {
    console.error("Error fetching users:", error);
    throw error; // Rethrow the error for the calling code to handle
  }
}

export async function updateUser(
  id: number,
  name: string,
  email: string,
  password: string,
  password_confirmation: string
) {
  try {
    const baseURL = import.meta.env.VITE_BASE_URL;
    const url = `${baseURL}/api/users/${id}`;
    const accessToken: string | null = localStorage.getItem("accessToken");

    const response = await fetch(url, {
      method: "PATCH",
      headers: {
        Authorization: `Bearer ${accessToken}`,
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        name,
        email,
        password,
        password_confirmation,
      }),
    });

    if (!response.ok) {
      handleUnauthorized(response);
      throw await response.json();
    }

    const data = await response.json();

    return data;
  } catch (error) {
    console.error("Error fetching users:", error);
    throw error; // Rethrow the error for the calling code to handle
  }
}

const handleUnauthorized = (response: any) => {
  if (response.status === 401) {
    localStorage.removeItem("accessToken");
    throw redirect(`/login`);
  }
};

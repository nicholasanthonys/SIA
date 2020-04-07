import axios from "axios";

export const getMajors = async () => {
  return axios.get("/api/majors");
};

export const getMajor = async id => {
  return axios.get("api/majors/" + id);
};

//INI ARTINYA APA ?
export const createMajor = async major => {
  return axios.post("api/majors", major, {
    headers: {
      "Content-Type": "application/json"
    }
  });
};

export const updateMajor = async major => {
    return axios.put('api/majors/' + major.id, major, {
        header : {
            'Content-Type' : 'application/json'
        }
    })
}

export const deleteMajor = async id => {
    return axios.delete('api/majors/' + id)
};

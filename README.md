# 📊 Number Classification API

This API takes a number and returns interesting mathematical properties about it, along with a fun fact.
It supports CORS, returns JSON responses, and is publicly accessible.

- Classifies numbers as **prime**, **perfect**, **Armstrong**, **odd**, or **even**.
- Calculates the **sum of digits** of the number.
- Fetches a **fun fact about the number** using the Numbers API.
- CORS-enabled for cross-origin requests.


It is implemented in **PHP**.

It is also publicly accessible at: <https://hng_task.dreywandowski.ng/api/classify-number?number=400>


## 📌 API Endpoint

### `GET https://hng_task.dreywandowski.ng/api/classify-number?number=400`


#### 🔹 Response Format (JSON)


### ✅ Success Response (200 OK)

```json
{
 "number": 371,
    "is_prime": false,
    "is_perfect": false,
    "properties": ["armstrong", "odd"],
    "digit_sum": 11,
    "fun_fact": "371 is an Armstrong number because 3^3 + 7^3 + 1^3 = 371"
}
```


### ❌ Error Response (400 Bad Request)

```json
{
    "number": "alpahbet",
    "error": true
}
```


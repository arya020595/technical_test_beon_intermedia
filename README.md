# Technical Test Beon Intermedia

## HOW TO RUN BACKEND ##
1. cd backend
2. setup database on file ".env"
3. php artisan migrate
4. php artisan db:seed
5. php artisan serve

**ARCHITECTURAL PATTERN**
1. Service pattern
2. Slim controller, Fat service

**Collection Postman**
[link](https://api.postman.com/collections/7412551-6b9a9bc7-c462-462a-b8c6-747606c82c90?access_key=PMAT-01HRQAZ5JQD5R8C76910FJH8JX)


## HOW TO RUN FRONTEND ##
1. cd frontend
2. pnpm install
3. open .env file and put VITE_BASE_URL=http://localhost:3000
4. pnpm dev

import { Router } from "express";
import UserController from "./app/controllers/UserController.js";
import { validateEmptyInputSignIn, validateEmptyInputSignUp, validateTypeInputSignIn, validateTypeInputSignUp } from "./app/middlewares/UserMiddlewares.js";
const router = Router();

router.post("/users", validateEmptyInputSignUp, validateTypeInputSignUp, UserController.create);

router.post("/users/sign-in", UserController.signIn);

router.get("/users/:id", UserController.show);

export default router;
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;
class AuthenticationController extends Controller
{
    public function register_form(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|string|min:3|max:60",
            "email" => "required|email",
            "password" => "required|string|min:5|max:12|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[!@#$%^&*]/"
        ], [
            "name.required" => "Name is required.",
            "name.min" => "Name must have 3 characters.",
            "name.max" => "Name can't be greater than 60 characters.",
            "email.required" => "Email is required.",
            "email.email" => "Enter the valid email address.",
            "password.required" => "Password is required.",
            "password.min" => "Password must be greater than 5 characters.",
            "password.max" => "Password can't be greater than 12 characters.",
            "password.regex" => "Password must have one uppercase, one lowercase and special characters."

        ]);

        // checking the employee exists using the email
        $employee_exits = User::select('email')->whereEmail($validate["email"])->first();
        if ($employee_exits) {
            return redirect()->back()->with("employee_exists", "Employee already exist.Tyr another email address.");
        }

        // generating the employee Id
        $date = date("Y");
        $random_num = random_int(1000, 9999);
        $architect_id = "AR" . $date . $random_num;

        // hashing the password
        $validate["password"] = Hash::make($validate['password']);

        // saving the user info
        $emplyoee_save = User::create(["name" => $validate['name'], "email" => $validate['email'], "architect_id" => $architect_id, "password" => $validate['password']]);

        if (!$emplyoee_save) {
            return redirect()->back()->with("tech_error", "Sorry! We are facing some technical error.");
        }


        return redirect()->route("login")->with("architect_id", "Your architect ID " . $architect_id);
    }
    public function login_form(Request $request)
    {

        $validate = $request->validate([
            "architect_id" => "required|string|min:10|max:10",
            "password" => "required|string|min:5|max:12|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@#$%^&*()]/"
        ], [
            "architect_id.required" => "Architect ID is required.",
            "architect_id.min" => "Architect ID must have 10 characters",
            "architect_id.max" => "Architect Id can't be greater than 10 characters.",
            "password.required" => "Password is required.",
            "password.min" => "Password must have 5 characters.",
            "password.max" => "Password can't be longer than 12 characters.",
            "password.regex" => "Password must have one uppercase, one lowercase and sepical characters."
        ]);

        // checking the emplyoyee
        $employee_exists = User::select("architect_id", 'password')->where("architect_id", $validate['architect_id'])->first();

        if (!$employee_exists) {
            return redirect()->back()->with("id_not_found", "Architect Id not found! Try again.");
        }

        // checking the hashed password
        $match_password = Hash::check($validate['password'], $employee_exists->password);
        if (!$match_password) {
            return redirect()->back()->with("password_failed", "Password doesn't match try again");
        }

        $authentication = Auth::attempt(['architect_id' => $request->architect_id, 'password' => $request->password]);

        if (!$authentication) {
            return redirect()->back()->with("Auth_err", "Some authentication error ! Try again.");
        }
        return redirect()->route("home");

    }
    public function forget_password_form(Request $request)
    {
        $validate = $request->validate([
            "email" => "required|email",

            "password" => "required|string|min:5|max:12|confirmed|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@#$%^&*()]/"
        ], [
            "email.required" => "Email is required.",
            "email.email" => "Enter the valid email address.",
            "password.required" => "Password is required.",
            "password.min" => "Password must have 5 characters.",
            "password.max" => "Password can't be greater than 12 characters.",
            "password.confirmed" => "Password do not match.",
            "password.regex" => "Password must have one uppercase, one lowercase adn special characters."
        ]);

        // checking the employee exists
        $employee_exist = User::where("email", $validate['email'])->first();

        if (!$employee_exist) {
            return redirect()->back()->with("employee_not_found", "Employee info not found! Try again.");
        }

        // hashing the password and saving
        $employee_exist->password = Hash::make($validate['password']);
        $employee_exist->save();

        // if (!$save) {
        //     return redirect()->back()->with("tech_error", "We are facing some technical error! Try again.");
        // }

        return redirect()->route("login")->with("password_update", "Password update Succesfully.");
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route("login")->with("logout", "logout succesfully.");
    }
}

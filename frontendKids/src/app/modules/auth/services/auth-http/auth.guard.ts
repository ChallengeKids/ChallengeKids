import { Injectable } from "@angular/core";
import {
  CanActivate,
  Router,
  ActivatedRouteSnapshot,
  RouterStateSnapshot,
} from "@angular/router";
import { AuthService } from "../auth.service";

@Injectable({
  providedIn: "root",
})
export class AuthGuard implements CanActivate {
  constructor(private authService: AuthService, private router: Router) {}

  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot
  ): boolean {
    const authData = this.authService.getAuthFromLocalStorage();

    if (authData && authData.role && authData.role.includes("ROLE_ADMIN")) {
      console.log("User has admin role");
      return true;
    }

    // Redirect to login page if not authenticated
    this.router.navigate(["/auth/login"], {
      queryParams: { returnUrl: state.url },
    });
    console.log(authData);
    return false;
  }
}

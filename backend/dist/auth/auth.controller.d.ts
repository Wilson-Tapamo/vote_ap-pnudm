import { AuthService } from './auth.service';
export declare class AuthController {
    private readonly authService;
    constructor(authService: AuthService);
    login(body: {
        login_email: string;
        mot_passe: string;
    }): Promise<{
        message: string;
        user?: undefined;
    } | {
        message: string;
        user: import("../vote-president/vote-president.entity").VotePresident;
    }>;
}

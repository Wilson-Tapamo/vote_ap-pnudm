import { Controller, Post, Body } from '@nestjs/common';
import { AuthService } from './auth.service';

@Controller('auth')
export class AuthController {
  constructor(private readonly authService: AuthService) {}

  @Post('login')
  async login(@Body() body: { login_email: string; mot_passe: string }) {
    const { login_email, mot_passe } = body;
    const user = await this.authService.validateUser(login_email, mot_passe);

    if (!user) {
      return { message: 'Login erroné, corrigez ou contactez l’administrateur' };
    }

    if (user.etat_vote === 1) {
      return { message: 'Vous avez déjà voté !' };
    }

    return { message: 'Connexion réussie', user };
  }
}

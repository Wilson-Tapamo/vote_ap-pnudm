import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { VotePresident } from '../vote-president/vote-president.entity';

@Injectable()
export class AuthService {
  constructor(
    @InjectRepository(VotePresident)
    private votePresidentRepository: Repository<VotePresident>,
  ) {}

  async validateUser(login_email: string, mot_passe: string): Promise<VotePresident | null> {
    const user = await this.votePresidentRepository.findOne({ where: { login_email } });
    if (user && user.mot_passe === mot_passe) {
      return user;
    }
    return null;
  }
}

import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { VotePresident } from './vote-president.entity';

@Injectable()
export class VotePresidentService {
  constructor(
    @InjectRepository(VotePresident)
    private votePresidentRepository: Repository<VotePresident>,
  ) {}

  async updateVote(login_email: string, candidate: string): Promise<any> {
    const user = await this.votePresidentRepository.findOne({ where: { login_email } });

    if (!user) {
      throw new Error('Login erroné, corrigez ou contactez l’administrateur');
    }

    if (user.etat_vote === 1) {
      throw new Error('Vous avez déjà voté !');
    }

    // Mise à jour du vote
    user[candidate] = 1;
    user.etat_vote = 1;
    user.date_heure_cnx = new Date();

    await this.votePresidentRepository.save(user);

    return { message: 'Vote enregistré avec succès' };
  }
}

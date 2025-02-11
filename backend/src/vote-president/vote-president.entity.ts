import { Entity, PrimaryColumn, Column } from 'typeorm';

@Entity('T_vote_president')
export class VotePresident {
  @PrimaryColumn()
  numero_electeur: number;

  @Column()
  nom_prenom_electeur: string;

  @Column()
  login_email: string;

  @Column()
  mot_passe: string;

  @Column()
  sexe: string;

  @Column()
  etat_vote: number;

  @Column({ nullable: true })
  date_heure_cnx: Date;

  @Column()
  Djeneba_Diawara: number;

  @Column()
  Faran_Sidibe: number;

  @Column()
  Moussa_Diomande: number;

  @Column()
  Vote_Blanc: number;
}

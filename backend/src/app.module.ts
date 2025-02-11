import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { AuthModule } from './auth/auth.module';
import { VotePresidentModule } from './vote-president/vote-president.module';
import { VotePresident } from './vote-president/vote-president.entity';

@Module({
  imports: [
    TypeOrmModule.forRoot({
      type: 'mysql',
      host: 'localhost',
      port: 3306,
      username: 'root',  // Remplacez par votre utilisateur de base de données
      password: 'password', // Remplacez par votre mot de passe
      database: 'bd_ap_pnudm',  // Nom de votre base de données
      entities: [
        VotePresident,
      ],
      synchronize: true,  // Ne jamais utiliser en production, mais pour le développement
    }),
    AuthModule,
    VotePresidentModule,
  ],
  controllers: [],
  providers: [],
})
export class AppModule {}
